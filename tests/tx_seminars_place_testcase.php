<?php
/***************************************************************
* Copyright notice
*
* (c) 2007 Mario Rimann (typo3-coding@rimann.org)
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Testcase for the place class in the 'seminars' extensions.
 *
 * @package		TYPO3
 * @subpackage	tx_seminars
 * @author		Mario Rimann <typo3-coding@rimann.org>
 */

require_once(t3lib_extMgm::extPath('seminars').'lib/tx_seminars_constants.php');
require_once(t3lib_extMgm::extPath('seminars').'class.tx_seminars_place.php');

require_once(t3lib_extMgm::extPath('oelib').'tests/fixtures/class.tx_oelib_testingframework.php');

class tx_seminars_place_testcase extends tx_phpunit_testcase {
	private $fixture;

	/** our instance of the testing framework */
	private $testingFramework;

	/** UID of the default fixture (i.e. of the dummy place record) */
	private $uidOfDefaultFixture;

	protected function setUp() {
		$this->testingFramework = new tx_oelib_testingframework('tx_seminars');

		$this->uidOfDefaultFixture = $this->testingFramework->createRecord(
			SEMINARS_TABLE_SITES,
			array(
				'title' => 'TEST Place 1',
				'city' => 'Tokyo',
				'country' => 'JP'
			)
		);
		$this->fixture = new tx_seminars_place($this->uidOfDefaultFixture);
	}

	protected function tearDown() {
		$this->testingFramework->cleanUp();
		unset($this->testingFramework);
		unset($this->fixture);
	}


	public function testGetUid() {
		$this->assertEquals(
			$this->uidOfDefaultFixture,
			$this->fixture->getUid()
		);
	}

	public function testGetTitle() {
		$this->assertEquals(
			'TEST Place 1',
			$this->fixture->getTitle()
		);
	}

	public function testGetCity() {
		$this->assertEquals(
			'Tokyo',
			$this->fixture->getCity()
		);
	}

	public function testGetCountry() {
		$this->assertEquals(
			'JP',
			$this->fixture->getCountryIsoCode()
		);
	}
}

?>