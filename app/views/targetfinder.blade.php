<?php  
// This file is the xml data sent to the energy star target finder porfolio manager
// the formate is taken from the site example request
// https://portfoliomanager.energystar.gov/webservices/home/api/targetFinder/targetFinder/post;jsessionid=1819B81241684F6E040465897241DAC3
// the file MUST remain in views for the PHP code to exicute properly 
// the file is called in the Api model in eui method

// this file defines the property uses array based on primary function
require public_path() . "/bldg_type.php";

// define property use based on primary function from user
$check = false;
$bldg = false;
foreach ($propertyuses as $key=>$value) {
    $check = array_search($input['bldg_type'],$value);
    if ($check !== false) {
        $bldg = $key;
    }
}

// Define energy type based on energy data from user
// If more energy types are added, this will need to be updated
$energy_type = [];
foreach ($input['energy'] as $key => &$value) {
    settype($value, 'integer');
    switch($key){
        case 'elec':
        $energy_type['elec']='Electric';
        break;
        case 'gas':
        $energy_type['gas']='Natural Gas';
        break;
    }
}
settype($input['gross_flr_area'], 'integer');
settype($input['zipcode'], 'integer');
?>
<targetFinder>
    <propertyInfo>
        <name>TARGET FINDER</name>
        <address address1="0" city="{{{ $input['city'] }}}"
                 postalCode="{{{ $input['zipcode'] }}}" state="{{{ $input['state'] }}}" country="{{{ $input['country'] }}}"/>
        <numberOfBuildings>1</numberOfBuildings>
        <primaryFunction>{{{$propertyuses[$bldg][0]}}}</primaryFunction>
        <plannedConstructionCompletionYear>2016</plannedConstructionCompletionYear>
        <grossFloorArea units="Square Feet" temporary="false">
            <value>{{{$input['gross_flr_area']}}}</value>
        </grossFloorArea>
    </propertyInfo>
    <propertyUses>
        <{{{$propertyuses[$bldg][1]}}}>
            <name>wattbott</name>
            <useDetails>
                <totalGrossFloorArea units="Square Feet">
                    <value>{{{$input['gross_flr_area']}}}</value>
                </totalGrossFloorArea>
            </useDetails>
        </{{{$propertyuses[$bldg][1]}}}>
    </propertyUses>
    <estimatedEnergyList>
        <entries>
            @foreach($input['energy'] as $key => &$value)
            <designEntry>
                <energyType>{{{ $energy_type[$key] }}}</energyType>
                <energyUnit>MBtu (million Btu)</energyUnit>
                <estimatedAnnualEnergyUsage>{{{ $value }}}</estimatedAnnualEnergyUsage>
                <energyRateCost>{{{$input['utility_rate'][$key][0]}}}</energyRateCost>
                <energyRateCostUnit>MBtu (million Btu)</energyRateCostUnit>
            </designEntry>
            @endforeach
        </entries>
    </estimatedEnergyList>
    <target>
        <targetTypeScore>
            <value>50</value>
        </targetTypeScore>
    </target>
</targetFinder>