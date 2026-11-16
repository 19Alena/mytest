#!/bin/bash
# Auto-generated patch application script for FusionPBX
set -e
DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
echo "=== Applying customizations for FusionPBX ==="
if [ -f "$DIR/full_project.patch" ]; then
    echo "Applying full_project.patch..."
    patch -p1 -N -r - < "$DIR/full_project.patch" || \
    git apply --ignore-whitespace "$DIR/full_project.patch" || \
    git apply --3way --ignore-whitespace "$DIR/full_project.patch"
    echo "Successfully applied customizations!"
else
    echo "No full_project.patch found in $DIR"
fi
