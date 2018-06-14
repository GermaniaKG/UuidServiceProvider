<?php
namespace tests;

use Ramsey\Uuid\Uuid;
use Pimple\Container as PimpleContainer;
use Germania\UuidServiceProvider\UuidServiceProvider;

class UuidServiceProviderTest extends \PHPUnit\Framework\TestCase
{

    public function testSimple()
    {
        $sut = new UuidServiceProvider;

        $dic = new PimpleContainer;
        $dic->register( $sut );

        $this->assertTrue( is_array($dic['UUID.config']) );
    }

    public function testUuidFactory()
    {
        $sut = new UuidServiceProvider;

        $dic = new PimpleContainer;
        $dic->register( $sut );

        $uuid1 = $dic['UUID.new'];
        $this->assertInstanceOf( Uuid::class, $uuid1 );

        $uuid2 = $dic['UUID.new'];
        $this->assertNotSame( $uuid1, $uuid2 );
    }


    public function testHexFactory()
    {
        $sut = new UuidServiceProvider;

        $dic = new PimpleContainer;
        $dic->register( $sut );

        $uuid_hex1 = $dic['UUID.new.hex'];
        $this->assertInternalType( "string", $uuid_hex1 );

        $uuid_hex2 = $dic['UUID.new.hex'];
        $this->assertNotEquals( $uuid_hex1, $uuid_hex2 );
    }


    public function testCallableFactory()
    {
        $sut = new UuidServiceProvider;

        $dic = new PimpleContainer;
        $dic->register( $sut );

        $factory_callable = $dic['UUID.Factory'];
        $this->assertTrue( is_callable( $factory_callable ) );

        $uuid1 = $factory_callable();
        $this->assertInstanceOf( Uuid::class, $uuid1 );

        // Call again ...
        $uuid2 = $factory_callable();
        $this->assertInstanceOf( Uuid::class, $uuid1 );

        // Both instances must not be identical
        $this->assertNotEquals( $uuid2, $uuid1 );

    }

    public function testCallableHexFactory()
    {
        $sut = new UuidServiceProvider;

        $dic = new PimpleContainer;
        $dic->register( $sut );

        $factory_callable = $dic['UUID.HexFactory'];
        $this->assertTrue( is_callable( $factory_callable ) );

        $uuid_hex1 = $factory_callable();
        $this->assertInternalType( "string", $uuid_hex1 );

        // Call again ...
        $uuid_hex2 = $factory_callable();

        // Both hex strings must not be identical
        $this->assertNotEquals( $uuid_hex2, $uuid_hex1 );

    }
}
