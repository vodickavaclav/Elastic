<?php declare(strict_types = 1);

namespace SpameriTests\Data\Entity\Video;


class Technical implements \Spameri\Elastic\Entity\IEntity
{

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Camera|NULL
	 */
	private $camera;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Runtime|NULL
	 */
	private $runtime;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Color|NULL
	 */
	private $color;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Ratio|NULL
	 */
	private $ratio;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Laboratory|NULL
	 */
	private $laboratory;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\FilmLength|NULL
	 */
	private $filmLength;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\NegativeFormat|NULL
	 */
	private $negativeFormat;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\CineProcess|NULL
	 */
	private $cineProcess;

	/**
	 * @var \SpameriTests\Data\Entity\Video\Technical\Printed|NULL
	 */
	private $printed;


	public function __construct(
		?\SpameriTests\Data\Entity\Video\Technical\Camera $camera = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\Runtime $runtime = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\Color $color = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\Ratio $ratio = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\Laboratory $laboratory = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\FilmLength $filmLength = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\NegativeFormat $negativeFormat = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\CineProcess $cineProcess = NULL
		, ?\SpameriTests\Data\Entity\Video\Technical\Printed $printed = NULL
	)
	{
		$this->camera = $camera;
		$this->runtime = $runtime;
		$this->color = $color;
		$this->ratio = $ratio;
		$this->laboratory = $laboratory;
		$this->filmLength = $filmLength;
		$this->negativeFormat = $negativeFormat;
		$this->cineProcess = $cineProcess;
		$this->printed = $printed;
	}


	public function entityVariables() : array
	{
		return \get_object_vars($this);
	}


	public function key() : string
	{

	}


	public function camera() : ?\SpameriTests\Data\Entity\Video\Technical\Camera
	{
		return $this->camera;
	}


	public function runtime() : ?\SpameriTests\Data\Entity\Video\Technical\Runtime
	{
		return $this->runtime;
	}


	public function color() : ?\SpameriTests\Data\Entity\Video\Technical\Color
	{
		return $this->color;
	}


	public function ratio() : ?\SpameriTests\Data\Entity\Video\Technical\Ratio
	{
		return $this->ratio;
	}


	public function laboratory() : ?\SpameriTests\Data\Entity\Video\Technical\Laboratory
	{
		return $this->laboratory;
	}


	public function filmLength() : ?\SpameriTests\Data\Entity\Video\Technical\FilmLength
	{
		return $this->filmLength;
	}


	public function negativeFormat() : ?\SpameriTests\Data\Entity\Video\Technical\NegativeFormat
	{
		return $this->negativeFormat;
	}


	public function cineProcess() : ?\SpameriTests\Data\Entity\Video\Technical\CineProcess
	{
		return $this->cineProcess;
	}


	public function printed() : ?\SpameriTests\Data\Entity\Video\Technical\Printed
	{
		return $this->printed;
	}
}
