# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

current_dir    = File.dirname(File.expand_path(__FILE__))
yml = YAML.load_file("#{current_dir}/config.yaml")
conf, vm =  yml['conf'], yml['vm']
# If you're on a new build of Windows 10 you can try to use NFS
os             = "bento/debian-" + conf['os']
# book repo
playbook_name  = "playbook-#{conf['projectname']}"
playbook       = "https://github.com/#{conf['org']}/#{playbook_name}.git" 

### work path variable to change in debug mode
# Be aware of shared folders when deleting things
# use `/vagrant` for debug ansible playbook and `/tmp` for common init
debug          = conf['debug_playbook']
folder         = debug ? '/vagrant' : '/tmp'
# nfs config
conf['nfs'], NFS = Vagrant::Util::Platform.darwin? || Vagrant::Util::Platform.linux? && !debug

# Vagrantfile API/syntax version.
VAGRANTFILE_API_VERSION = "2"
Vagrant.require_version ">= 2.0.1"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = os
  config.ssh.insert_key = false
  config.ssh.forward_agent = true

  # reload nfs / shared folder after provision
  if File.exist?(".vagrant/machines/default/virtualbox/action_provision") && !debug
    if debug
      # shared folder to get the playbook to test 
      config.vm.synced_folder ".", "#{folder}", owner:'vagrant', group: 'vagrant'
    elsif NFS 
      # NFS FOR LINUX & MAC : faster
      config.vm.synced_folder "./www", "/data/ecs/www", type: "nfs", after: :provision,
      nfs_udp: "false", mount_options: ['rw', 'vers=3', 'tcp', 'fsc']
      # disable default shared folder
      config.vm.synced_folder ".", "/vagrant", disabled: true
    end
  else
    config.trigger.after [:provision] do |t|
      t.name = "Reboot after provisioning"
      t.run = { :inline => "vagrant reload" }
    end
  end

  config.vm.provider "virtualbox" do |vb|
      vm.each do |name, param|
        vb.customize ["modifyvm", :id, "--#{name}", param]
      end
  end

  config.vm.network "forwarded_port", guest: 80, host: 81

  config.vm.hostname = conf['servername']
  config.vm.network :private_network, ip: conf['private_ip']

  if !debug
    $init = <<-SCRIPT
    sudo apt -y install git;
    git clone #{playbook} /tmp/#{playbook_name};
    /bin/sh /tmp/#{playbook_name}/tools/install.sh;
    SCRIPT

    config.vm.provision "shell", inline: $init, privileged: false
  end

  ## Install and configure software
  config.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "#{folder}/#{playbook_name}/playbook.yml"
      ansible.become = true
      ansible.verbose = ""
      ansible.extra_vars = conf
  end
end


# && !