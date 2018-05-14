<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$viettel = 1000;
    	$vinaphone =2000;
    	$mobiphone =3000;
    	$vietnammobile =4000;
    	for($i = 1; $i <= 200;$i++)
    	{
    		if($i<50){
    			$viettel++;
    			DB::table('thecao')->insert(
    				[
    					'loaithe' => 'Viettel',
    					'mathe' => ''.$viettel.'',
    					'seri' => ''.$viettel.'',
    					'status'=> 0,
    					
    				]
    			);
    		}
    		if($i>=50 && $i<100){
    			$mobiphone++;
    			DB::table('thecao')->insert(
    				[
    					'loaithe' => 'Mobiphone',
    					'mathe' => ''.$mobiphone.'',
    					'seri' => ''.$mobiphone.'',
    					'status'=> 0,
    					
    				]
    			);
    		}
    		if($i>=100 && $i<150){
    			$vinaphone++;
    			DB::table('thecao')->insert(
    				[
    					'loaithe' => 'Vinaphone',
    					'mathe' => ''.$vinaphone.'',
    					'seri' => ''.$vinaphone.'',
    					'status'=> 0,
    					
    				]
    			);
    		}
    		if($i>=150 && $i<=200){
    			$vietnammobile++;
    			DB::table('thecao')->insert(
    				[
    					'loaithe' => 'VietnamMobile',
    					'mathe' => ''.$vietnammobile.'',
    					'seri' => ''.$vietnammobile.'',
    					'status'=> 0,
    					
    				]
    			);
    		}
    	}
    }
}
