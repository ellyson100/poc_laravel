terraform {
  required_providers {
    google = {
      source  = "registry.opentofu.org/hashicorp/google"
      version = "~> 4.0"
    }
  }
}

provider "google" {
  project     = "475058725041"
  region      = "us-east1"
  credentials = file("./credentials.json")
}

resource "google_compute_region_autoscaler" "autoscaler" {
  name   = "cpu-autoscaler-poc-cpb"
  region = "us-east1"
  target = google_compute_region_instance_group_manager.mig.id

  autoscaling_policy {
    min_replicas = 1
    max_replicas = 5

    cpu_utilization {
      target = 0.8
    }
  }
}

resource "google_compute_region_instance_group_manager" "mig" {
  name             = "poc-cpb"
  region           = "us-east1"
  base_instance_name = "poc-cpb"
  
  version {
    name              = "v1"
    instance_template = google_compute_instance_template.ubuntu.id
  }
}

resource "google_compute_instance_template" "ubuntu" {
  name_prefix = "ubuntu-2404-noble-amd64-v20250313"
  region      = "us-east1"
  machine_type = "e2-medium"

  disk {
    source_image = "imagem-tobook-laravel-poc-kcrn"
    auto_delete  = true
    boot         = true
  }

  network_interface {
    network = "default"
  }

  metadata_startup_script = file("./startup-script.sh")
}
