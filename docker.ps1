Param (
# Setting command line arguments with default values if needed
    [string] $restart = "no",
    [string] $log,
    [string] $config = "php.yml",
    [string] $stack = "php8",
    [string] $shutdown
)


function Start-Docker
{
    docker stack deploy -c $config $stack
    if ($log.Length -ne 0)
    {
        $serviceToLog = $stack + "_" + $log
        docker service logs -f $serviceToLog
    }
}

function Restart-Docker
{
    # Check if the stack is already running. If the stack is running, then remove it. If it's not then skip that and start the stack
    $stackCount = (docker stack services $stack).Count
    if ($stackCount -gt 1)
    {
        docker stack rm $stack > $null
        Write-Host "Sleeping for 15 seconds to allow the stack to be removed completely"
        Start-Sleep -s 15
    }
    Start-Docker;
}

Write-Host $shutdown
if ($shutdown -eq "yes")
{
    Write-Host "Shutting down..."
    docker stack rm $stack > $null
    exit;
}
if ($restart -eq "yes")
{
    Restart-Docker;
}
else
{
    Start-Docker;
}


