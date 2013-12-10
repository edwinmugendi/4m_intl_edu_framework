Vagrant.configure("2") do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.network :private_network, ip: "192.168.56.145"
    config.ssh.forward_agent = true

  config.vm.network :forwarded_port, guest: 80, host: 8092

  config.vm.provider :virtualbox do |v|
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--memory", 1024]
    v.customize ["modifyvm", :id, "--name", "vagrant-ubuntu-precise-12.04-ADEC-DEV02"]
  end


  config.vm.synced_folder "./", "/var/www", id: "vagrant-root", :mount_options => ["dmode=777","fmode=666"]
  config.vm.provision :shell, :inline =>
    "if [[ ! -f /apt-get-run ]]; then sudo apt-get update && sudo touch /apt-get-run; fi"


  config.vm.provision :shell, :inline => 'echo -e "mysql_root_password=root
controluser_password=awesome" > /etc/phpmyadmin.facts;'

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "vagrant/manifests"
    puppet.module_path = "vagrant/modules"
    puppet.options = ['--verbose']
  end
end