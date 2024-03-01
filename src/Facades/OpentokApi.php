<?php

namespace HomedoctorEs\OpentokLaravel\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class OpentokApi extends BaseFacade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'OpentokApi';
    }

}
