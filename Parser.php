<?php


class Parser {

	public function process() {
		$string   = file_get_contents( './woreda_ethiopia_2019_1.geojson' );
		$geo_data = json_decode( $string, true );

		$result = [];
		foreach ( $geo_data['features'] as $entry ) {
			$result[] = sprintf( "%s - %s - %s", $entry['properties']['REGIONNAME'], $entry['properties']['ZONENAME'],
				$entry['properties']['WOREDANAME'] );
		}

		file_put_contents( "names.json", json_encode( $result ) );

	}
}


$parser = new Parser();
$parser->process();
