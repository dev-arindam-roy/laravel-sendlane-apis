<?php
  
namespace Arindam\SendlaneApis\Sendlane;
use Illuminate\Support\Facades\Facade;
  
class SendlaneClassFacade extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'sendlaneclass'; 
    }
}