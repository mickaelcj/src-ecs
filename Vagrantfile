# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

current_dir    = File.dirname(File.expand_path(__FILE__))
conf           = YAML.load_file("#{current_dir}/config.yaml")['configs']
NFS            = Vagrant::Util::Platform.darwin? || Vagrant::Util::Platform.linux?
os             = "bento/debian-" + conf['os']

playbook_name  = "playbook-#{conf['projectname']}"
playbook       = "https://github.com/g4-dev/#{playbook_name}.git" 

### work path variable to change in debug mode
# use `/vagrant` for debug ansible playbook
folder  = '/tmp' #'/vagrant'

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.require_version ">= 2.0.1"

# All Vagrant configuration is done below. The "2" in Vagrant.configure
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = os
  config.ssh.insert_key = false
  config.ssh.forward_agent = true

  if folder == '/vagrant'
    config.vm.synced_folder ".", "#{folder}", owner:'vagrant', group: 'vagrant'
  else 
    # disable default shared folder
    config.vm.synced_folder ".", "/vagrant", disabled: true
  end

  config.vm.provider "virtualbox" do |vb|
      vb.gui = false
      vb.customize ['modifyvm', :id, '--memory', 2048]
      vb.customize ["modifyvm", :id, "--cpus", 2]
      vb.customize ["modifyvm", :id, "--name", conf['vmname']]
  end

  # Configure the VM
  config.vm.network "forwarded_port", guest: 80, host: 81
  config.vm.hostname = conf['servername']
  config.vm.network :private_network, ip: conf['private_ip']
  
  $init = <<-SCRIPT
    echo [Init ansible and the playbook];
    sudo apt -y install git;
    git clone #{playbook} /tmp/#{playbook_name};
    /bin/sh /tmp/#{playbook_name}/tools/install.sh;
  SCRIPT

  if folder == '/tmp'
    config.vm.provision "shell", inline: $init, privileged: false
  end

  ## Install and configure software
  config.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "#{folder}/#{playbook_name}/playbook.yml"
      ansible.become = true
      ansible.verbose = ""
      ansible.extra_vars = {
          servername: conf['servername'],
          projectname: conf['projectname'],
          testing_mode:  conf['testing_mode'],
          ansible_host: conf['private_ip'],
          app_env: conf['app_env'],
          web_path: conf['web_path'],
          nfs: NFS
      }
  end

  # FOR LINUX / MAC : uncomment after provision
  # if NFS
  #   config.vm.synced_folder "./www", "/data/ecs/www", type: "nfs"
  # end
end


