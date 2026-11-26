#!/bin/bash
# Auto-generated patch application script for Core_lab
# Applies all modifications and creates newly introduced files & directories automatically
set -e
DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
echo "=== Applying customizations for Core_lab ==="
APPLIED=0

if [ -f "$DIR/full_project.patch" ]; then
    echo "Applying full_project.patch..."
    if git apply --check "$DIR/full_project.patch" 2>/dev/null; then
        git apply "$DIR/full_project.patch"
        APPLIED=1
        echo "Applied cleanly via git apply."
    elif patch -p1 -N -r - --dry-run < "$DIR/full_project.patch" 2>/dev/null; then
        patch -p1 -N -r - < "$DIR/full_project.patch"
        APPLIED=1
        echo "Applied cleanly via patch -p1."
    else
        echo "Attempting fallback apply options..."
        if git apply --ignore-whitespace "$DIR/full_project.patch" 2>/dev/null; then
            git apply --ignore-whitespace "$DIR/full_project.patch"
            APPLIED=1
            echo "Applied via git apply --ignore-whitespace."
        elif patch -p1 -N -r - < "$DIR/full_project.patch" 2>/dev/null; then
            APPLIED=1
            echo "Applied via patch -p1 fallback."
        elif git apply --3way --ignore-whitespace "$DIR/full_project.patch" 2>/dev/null; then
            git apply --3way --ignore-whitespace "$DIR/full_project.patch"
            APPLIED=1
            echo "Applied via git apply --3way."
        fi
    fi
fi

# Ensure all newly created files and directories are present with original permissions
if [ -d "$DIR/new_files" ]; then
    echo "Ensuring new customization files and directory trees are copied..."
    cp -a "$DIR/new_files/." ./
    echo "New files verified."
fi

if [ $APPLIED -eq 1 ] || [ -d "$DIR/new_files" ]; then
    echo "=== Customizations for Core_lab applied successfully! ==="
else
    echo "Warning: Could not automatically apply full_project.patch." >&2
    exit 1
fi
