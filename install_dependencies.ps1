# Does not run from IntelliJ right-click / Run...
# Go to the correct directory
$project_dir = ($pwd).Path
$script_dir = -join ($project_dir, "\src")
Set-Location -Path $script_dir

# NodeJS must be installed
npm clean-install
npm install

Set-Location -Path $project_dir;