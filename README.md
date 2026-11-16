# VoIP Customization Tracker - Exported Patches

Automated repository for generated customization patches from **Customization Tracker**.

- **Remote Repository:** `git@github.com:19Alena/mytest.git`
- **Branch:** `main`
- **Last Updated:** `2026-11-16T21:21:52.951285Z`

## Projects & Patches

| ID | Project Name | Host | Base Ref | Patches Available |
|---|---|---|---|---|
| 1 | **BPC-lab_CP** | `192.168.0.110` | `origin/9.3.6` | 13 patches |

## How to Apply Patches

To apply customizations for any project to a target clean working directory:

```bash
# 1. Navigate to your target application directory
cd /var/www/html/opensips-cp

# 2. Run the automated apply script for the project
bash /path/to/mytest/patches/<Project_Name>/apply_patches.sh

# Or apply the unified full_project.patch manually
patch -p1 -N -r - < /path/to/mytest/patches/<Project_Name>/full_project.patch
```

## Security Notice

All database passwords in generated patches are sanitized and dynamically loaded via:
```php
$config->db_pass = trim(file_get_contents(getenv('DB_PASSWORD_FILE')));
```
