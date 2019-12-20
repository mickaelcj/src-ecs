# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

current_dir    = File.dirname(File.expand_path(__FILE__))
conf           = YAML.load_file("#{current_dir}/config.yaml")
NFS            = Vagrant::Util::Platform.darwin? || Vagrant::Util::Platform.linux?
os             = "bento/debian-" + conf['os']
playbook_name  = "playbook-#{conf['projectname']}"
playbook       = "https://github.com/g4-dev/#{playbook_name}.git" 

### work path variable to change in debug mode
# Be aware of shared folders when deleting things
# use `/vagrant` for debug ansible playbook and `/tmp` for common init
debug_folder   = '/vagrant'
normal_folder  = '/tmp'
# let's init the playbook folder 
folder         = normal_folder

## Boost vmname

# Vagrantfile API/syntax version.
VAGRANTFILE_API_VERSION = "2"
Vagrant.require_version ">= 2.0.1"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = os
  config.ssh.insert_key = false
  config.ssh.forward_agent = true

  if folder == debug_folder
    config.vm.synced_folder ".", "#{folder}", owner:'vagrant', group: 'vagrant'
  else 
    # disable default shared folder
    config.vm.synced_folder ".", "#{debug_folder}", disabled: true
  end

  config.vm.provider "virtualbox" do |vb|
      vb.customize ["modifyvm", :id, "--name", conf['vmname']]
      vb.customize ['modifyvm', :id, '--memory', 3072]
      vb.customize ["modifyvm", :id, "--cpus", 2]
      vb.customize ["modifyvm", :id, "--cpuexecutioncap", 75]
      vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
      vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
      vb.customize ["modifyvm", :id, "--ioapic", "on"]

      conf.vm.each do |key, param|
        puts "The current array item is: #{item}, #{key}"
        vb.customize ["modifyvm", :id, "--#{key}", param]
      end

  end

  config.vm.network "forwarded_port", guest: 80, host: 81
  #config.vm.network "forwarded_port", guest: 9000, host: 90
  config.vm.hostname = conf['servername']
  config.vm.network :private_network, ip: conf['private_ip']

  $init = <<-SCRIPT
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
          servername: conf.servername,
          projectname: conf.projectname,
          testing_mode:  conf.testing_mode,
          ansible_host: conf.private_ip,
          app_env: conf.app_env,
          web_path: conf.web_path,
          nfs: NFS || folder == debug_folder # don't clean ansible after vm provision
      }
  end

  # FOR LINUX / MAC : uncomment after provision to enable shared folder nfs
  # if NFS
  #   config.vm.synced_folder "./www", "/data/ecs/www", type: "nfs"
  # end
end


