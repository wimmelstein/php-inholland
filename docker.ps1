Param (
    [string] $restart = $null,
    [string] $log,
    [string] $configFile = "php.yml",
    [string] $stackName = "php8"
)


function Start-Docker
{
    docker stack deploy -c $configFile $stackName
    if ($log.Length -ne 0)
    {
        $serviceToLog = $stackName + "_" + $log
        docker service logs -f $serviceToLog
    }
}

function Restart-Docker
{
    docker stack rm $stackName
    Start-Sleep -s 15
    Start-Docker;
}
if ($restart.Length -eq 0)
{
    Start-Docker;
}
else
{
    Restart-Docker;
}


