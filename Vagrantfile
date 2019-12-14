# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'

current_dir    = File.dirname(File.expand_path(__FILE__))
conf           = YAML.load_file("#{current_dir}/config.yaml")['configs']
NFS  = Vagrant::Util::Platform.darwin? || Vagrant::Util::Platform.linux?

playbook_name  = "playbook-#{conf['projectname']}"
playbook       = "https://github.com/g4-dev/#{playbook_name}.git" 
os             = "bento/debian-" + conf['os']

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

# Check minimum Vagrant version
Vagrant.require_version ">= 2.0.1"

# All Vagrant configuration is done below. The "2" in Vagrant.configure
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = os
  config.ssh.insert_key = false
  config.ssh.forward_agent = true

  config.vm.provider "virtualbox" do |vb|
      vb.gui = false
      
      vb.customize ['modifyvm', :id, '--memory', 2048]
      vb.customize ["modifyvm", :id, "--cpus", 2]
      vb.customize ["modifyvm", :id, "--name", conf['vmname']]
  end

  # Configure the VM
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.hostname = conf['servername']
  config.vm.network :private_network, ip: conf['private_ip']
  
  $init = <<-SCRIPT
  echo [Init ansible and the playbook];
  cd #{conf['web_path']}
  if [ ! -d #{playbook_name}];then
    git clone #{playbook};
  fi
  /bin/sh #{playbook_name}/tools/install.sh
  SCRIPT

  config.vm.provision "shell", inline: $init

  ## Install and configure software
  config.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "#{playbook_name}/playbook.yml"
      ansible.become = true
      ansible.verbose = ""
      ansible.extra_vars = {
        servername: conf['servername'],
        projectname: conf['projectname'],
        testing_mode:  conf['testing_mode'], 
        symfony_version: conf['symfony_version'],
        ansible_host: conf['private_ip'],
        nfs: NFS,
        app_env: conf['app_env'],
        web_path: conf['web_path']
    }
  end

  # Enable NFS after provision
  # if NFS
  #     config.vm.synced_folder "./www", "conf['web_path]", type: "nfs"
  # end
end
