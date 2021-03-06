<?php declare(strict_types = 1);

namespace SpameriTests\Data\Entity\Video;


class HighLights implements \Spameri\Elastic\Entity\IEntity
{

	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\TriviaCollection
	 */
	private $trivia;
	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\GoofCollection
	 */
	private $goof;
	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\CrazyCreditCollection
	 */
	private $crazyCredit;
	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\QuoteCollection
	 */
	private $quote;
	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\LocationCollection
	 */
	private $location;

	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\AlternateVersionCollection
	 */
	private $alternateVersion;

	/**
	 * @var \SpameriTests\Data\Entity\Video\HighLights\CompanyCreditCollection
	 */
	private $companyCredit;


	public function __construct(
		\SpameriTests\Data\Entity\Video\HighLights\TriviaCollection $trivia
		, \SpameriTests\Data\Entity\Video\HighLights\GoofCollection $goofs
		, \SpameriTests\Data\Entity\Video\HighLights\CrazyCreditCollection $crazyCredits
		, \SpameriTests\Data\Entity\Video\HighLights\QuoteCollection $quotes
		, \SpameriTests\Data\Entity\Video\HighLights\LocationCollection $locations
		, \SpameriTests\Data\Entity\Video\HighLights\AlternateVersionCollection $alternateVersions
		, \SpameriTests\Data\Entity\Video\HighLights\CompanyCreditCollection $companyCredit
	)
	{
		$this->trivia = $trivia;
		$this->goof = $goofs;
		$this->crazyCredit = $crazyCredits;
		$this->quote = $quotes;
		$this->location = $locations;
		$this->alternateVersion = $alternateVersions;
		$this->companyCredit = $companyCredit;
	}


	public function entityVariables() : array
	{
		return \get_object_vars($this);
	}


	public function key() : string
	{

	}


	public function trivia() : \SpameriTests\Data\Entity\Video\HighLights\TriviaCollection
	{
		return $this->trivia;
	}


	public function goof() : \SpameriTests\Data\Entity\Video\HighLights\GoofCollection
	{
		return $this->goof;
	}


	public function crazyCredit() : \SpameriTests\Data\Entity\Video\HighLights\CrazyCreditCollection
	{
		return $this->crazyCredit;
	}


	public function quote() : \SpameriTests\Data\Entity\Video\HighLights\QuoteCollection
	{
		return $this->quote;
	}


	public function location() : \SpameriTests\Data\Entity\Video\HighLights\LocationCollection
	{
		return $this->location;
	}


	public function alternateVersion() : \SpameriTests\Data\Entity\Video\HighLights\AlternateVersionCollection
	{
		return $this->alternateVersion;
	}


	public function companyCredit() : \SpameriTests\Data\Entity\Video\HighLights\CompanyCreditCollection
	{
		return $this->companyCredit;
	}

}
