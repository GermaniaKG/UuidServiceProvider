<?php
namespace Germania\UuidServiceProvider;

use Ramsey\Uuid\Uuid;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class UuidServiceProvider implements ServiceProviderInterface
{

    public $config = array();

    public function __construct( array $config = array() )
    {
        $this->config = array_merge($this->config, $config);
    }


    /**
     * @implements ServiceProviderInterface
     */
    public function register(Container $dic)
    {

        /**
         * @return array
         */
        $dic['UUID.config'] = function( $dic ) {
            return $this->config;
        };

        /**
         * @return Ramsey\Uuid\Uuid
         */
        $dic['UUID.new'] = $dic->factory(function( $dic ) {
            return Uuid::uuid4();
        });

        /**
         * @return string
         */
        $dic['UUID.new.hex'] = $dic->factory(function( $dic ) {
            $hex = $dic['UUID.new']->getHex();
            return is_string($hex) ? $hex : $hex->__toString();
        });


        /**
         * @return Callable
         */
        $dic['UUID.Factory'] = $dic->protect(function() use ($dic) {
            return $dic['UUID.new'];
        });

        /**
         * @return Callable
         */
        $dic['UUID.HexFactory'] = $dic->protect(function() use ($dic) {
            return $dic['UUID.new.hex'];
        });


    }
}
