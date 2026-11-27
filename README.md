# VoIP Customization Tracker - Exported Patches

Automated repository for generated customization patches from **Customization Tracker**.

- **Remote Repository:** `git@github.com:19Alena/mytest.git`
- **Branch:** `main`
- **Last Updated:** `2026-11-27T00:37:46.917681Z`

## Projects & Patches

| ID | Project Name | Host | Base Ref | Clean Base Commit | Patches Available |
|---|---|---|---|---|---|
| 1 | **BPC-lab_CP** | `192.168.0.109` | `origin/9.3.6` | `ac8086e5b68e` | 0 patches |
| 2 | **Core_lab** | `192.168.0.109` | `origin/9.3.6` | `89a4cde140c1` | 38 patches |

## Clean Base Commits & Docker Image Builds

Each project folder contains `BASE_COMMIT.txt` recording the exact clean upstream base commit used to generate the patches, including upstream repository URL and branch:

```ini
# Example patches/BPC-lab_CP/BASE_COMMIT.txt
b39a836d713b55d3496d525b97fd139f48f0c47f
COMMIT=b39a836d713b55d3496d525b97fd139f48f0c47f
BASE_COMMIT=b39a836d713b55d3496d525b97fd139f48f0c47f
BRANCH=9.3.6
BASE_BRANCH=9.3.6
REPOSITORY=https://github.com/OpenSIPS/opensips-cp.git
BASE_REPO=https://github.com/OpenSIPS/opensips-cp.git
```

To check out the clean upstream base during a Docker build or automated deploy:

```bash
BASE_COMMIT=$(head -n 1 /path/to/patches_repo/patches/<Project_Name>/BASE_COMMIT.txt)
if [ "$BASE_COMMIT" != "unknown" ]; then
    git checkout "$BASE_COMMIT"
fi
```

## How to Apply Patches

To apply customizations for any project to a target clean working directory:

```bash
# 1. Navigate to your target application directory
cd /var/www/html/opensips-cp

# 2. Run the automated apply script for the project
bash /path/to/patches_repo/patches/<Project_Name>/apply_patches.sh

# Or apply the unified full_project.patch manually
patch -p1 -N -r - < /path/to/patches_repo/patches/<Project_Name>/full_project.patch
```

## Security Notice

All database passwords in generated patches are sanitized and dynamically loaded via:
```php
$config->db_pass = trim(file_get_contents(getenv('DB_PASSWORD_FILE')));
```
