# Go to the correct directory
# shellcheck disable=SC2155
export projectdir=$(pwd)
export scriptdir="$projectdir/src"
# shellcheck disable=SC2164
cd "$scriptdir"

npm clean-install
npm install

# shellcheck disable=SC2164
cd "$projectdir"
