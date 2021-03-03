:: Go to the correct directory
cd src

:: Remove node modules first
del /f /q /s node_modules > NUL

:: NodeJS must be installed
npm install signature_pad
