<?php

namespace SpameriTests\Elastic\Factory;


class VideoFactory implements \Spameri\Elastic\Factory\IEntityFactory
{

	/**
	 * @var \SpameriTests\Data\Model\PersonService
	 */
	private $personService;


	public function __construct(
		\SpameriTests\Data\Model\PersonService $personService
	)
	{
		$this->personService = $personService;
	}


	public function create(\Spameri\ElasticQuery\Response\Result\Hit $hit)
	{
		$people = new \SpameriTests\Data\Entity\Video\People(
			$this->personService,
			$hit->getValue('people')
		);

		return new \SpameriTests\Data\Entity\Video(
			new \Spameri\Elastic\Entity\Property\ElasticId($hit->getValue('id')),
			new \SpameriTests\Data\Entity\Video\Identification(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('identification.imdb'))
			),
			new \SpameriTests\Data\Entity\Property\Name($hit->getValue('name')),
			new \SpameriTests\Data\Entity\Property\Year($hit->getValue('year')),
			new \SpameriTests\Data\Entity\Video\Technical(
				new \SpameriTests\Data\Entity\Video\Technical\Camera($hit->getValue('technical.camera')),
				new \SpameriTests\Data\Entity\Video\Technical\Runtime($hit->getValue('technical.runtime')),
				new \SpameriTests\Data\Entity\Video\Technical\Color($hit->getValue('technical.color')),
				new \SpameriTests\Data\Entity\Video\Technical\Ratio($hit->getValue('technical.ratio')),
				new \SpameriTests\Data\Entity\Video\Technical\Laboratory($hit->getValue('technical.laboratory')),
				new \SpameriTests\Data\Entity\Video\Technical\FilmLength($hit->getValue('technical.filmLength')),
				new \SpameriTests\Data\Entity\Video\Technical\NegativeFormat($hit->getValue('technical.negativeFormat')),
				new \SpameriTests\Data\Entity\Video\Technical\CineProcess($hit->getValue('technical.cineProcess')),
				new \SpameriTests\Data\Entity\Video\Technical\Printed($hit->getValue('technical.printed')
			)),
			new \SpameriTests\Data\Entity\Video\Story(
				new \SpameriTests\Data\Entity\Property\Description($hit->getValue('story.description')),
				new \SpameriTests\Data\Entity\Video\Story\TagLineCollection( ... $this->tagLine($hit->getValue('story.tagLines'))),
				new \SpameriTests\Data\Entity\Video\Story\PlotSummaryCollection( ... $this->plotSummary($hit->getValue('story.plots'))),
				new \SpameriTests\Data\Entity\Video\Story\KeyWordCollection( ... $this->keyWord($hit->getValue('story.keyWords'))),
				new \SpameriTests\Data\Entity\Video\Story\Synopsis($hit->getValue('story.synopsis'))
			),
			new \SpameriTests\Data\Entity\Video\Details(
				new \SpameriTests\Data\Entity\Video\Details\GenreCollection( ... $this->genre($hit->getValue('details.genres'))),
				new \SpameriTests\Data\Entity\Video\Details\AliasCollectionElastic( ... $this->alias($hit->getValue('details.alias'))),
				new \SpameriTests\Data\Entity\Video\Details\ReleaseCollectionElastic( ... $this->release($hit->getValue('details.release'))),
				new \SpameriTests\Data\Entity\Video\Details\Ratings(
					new \SpameriTests\Data\Entity\Video\Details\RatingsCount($hit->getValue('details.ratings.imdbRatings'))
				)
			),
			new \SpameriTests\Data\Entity\Video\HighLights(
				new \SpameriTests\Data\Entity\Video\HighLights\TriviaCollection( ...$this->trivia($hit->getValue('highLights.trivia'))),
				new \SpameriTests\Data\Entity\Video\HighLights\GoofCollection( ... $this->goof($hit->getValue('highLights.goof'))),
				new \SpameriTests\Data\Entity\Video\HighLights\CrazyCreditCollection( ... $this->crazyCredit($hit->getValue('highLights.crazyCredit'))),
				new \SpameriTests\Data\Entity\Video\HighLights\QuoteCollection( ... $this->quote($hit->getValue('highLights.quote'))),
				new \SpameriTests\Data\Entity\Video\HighLights\LocationCollection( ... $this->location($hit->getValue('highLights.location'))),
				new \SpameriTests\Data\Entity\Video\HighLights\AlternateVersionCollection( ... $this->alternateVersion($hit->getValue('highLights.alternateVersion'))),
				new \SpameriTests\Data\Entity\Video\HighLights\CompanyCreditCollection( ... $this->companyCredit($hit->getValue('highLights.companyCredit')))
			),
			new \SpameriTests\Data\Entity\Video\Connections(
				new \SpameriTests\Data\Entity\Video\Connections\FollowedCollection( ... $this->followed($hit->getValue('connections.followed'))),
				new \SpameriTests\Data\Entity\Video\Connections\RemadeCollection( ... $this->remade($hit->getValue('connections.remade'))),
				new \SpameriTests\Data\Entity\Video\Connections\SpinOffCollection( ... $this->spinOff($hit->getValue('connections.spinOff'))),
				new \SpameriTests\Data\Entity\Video\Connections\EditedIntoCollection( ... $this->editedInto($hit->getValue('connections.editedInto'))),
				new \SpameriTests\Data\Entity\Video\Connections\ReferenceCollection( ... $this->reference($hit->getValue('connections.reference'))),
				new \SpameriTests\Data\Entity\Video\Connections\ReferencedCollection( ... $this->referenced($hit->getValue('connections.referenced'))),
				new \SpameriTests\Data\Entity\Video\Connections\FeaturedCollection( ... $this->featured($hit->getValue('connections.featured'))),
				new \SpameriTests\Data\Entity\Video\Connections\SpoofedCollection( ... $this->spoofed($hit->getValue('connections.spoofed'))),
				new \SpameriTests\Data\Entity\Video\Connections\FollowsCollection( ... $this->follows($hit->getValue('connections.follows'))),
				new \SpameriTests\Data\Entity\Video\Connections\SpunOffCollection( ... $this->spunOff($hit->getValue('connections.spunOff'))),
				new \SpameriTests\Data\Entity\Video\Connections\VersionOfCollection( ... $this->versionOf($hit->getValue('connections.versionOf'))),
				new \SpameriTests\Data\Entity\Video\Connections\EditedFromCollection( ... $this->editedFrom($hit->getValue('connections.editedFrom')))
			),
			$people
		);
	}


	public function keyWord(
		array $keyWords
	) : \Generator
	{
		foreach ($keyWords as $keyWord) {
			yield new \SpameriTests\Data\Entity\Video\Story\KeyWord($keyWord);
		}
	}


	public function genre(
		array $genres
	) : \Generator
	{
		foreach ($genres as $genre) {
			yield new \SpameriTests\Data\Entity\Video\Details\Genre($genre);
		}
	}


	public function alias(
		array $aliases
	) : \Generator
	{
		foreach ($aliases as $alias) {
			yield new \SpameriTests\Data\Entity\Video\Details\Alias(
				new \SpameriTests\Data\Entity\Property\CountryShort($alias['country']),
				new \SpameriTests\Data\Entity\Property\Text($alias['name'])
			);
		}
	}


	public function release(
		array $releases
	) : \Generator
	{
		foreach ($releases as $release) {
			yield new \SpameriTests\Data\Entity\Video\Details\Release(
				new \SpameriTests\Data\Entity\Property\CountryShort($release['country']),
				new \Spameri\Elastic\Entity\Property\Date($release['date']),
				new \SpameriTests\Data\Entity\Property\Text($release['note'])
			);
		}
	}


	public function crazyCredit(
		array $crazyCredits
	) : \Generator
	{
		foreach ($crazyCredits as $crazyCredit) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\CrazyCredit(
				new \SpameriTests\Data\Entity\Property\ImdbId($crazyCredit['id']),
				new \SpameriTests\Data\Entity\Property\Text($crazyCredit['text']),
				new \SpameriTests\Data\Entity\Video\HighLights\Relevancy($crazyCredit['relevancy'])
			);
		}
	}


	public function quote(
		array $quotes
	) : \Generator
	{
		foreach ($quotes as $quote) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\Quote(
				new \SpameriTests\Data\Entity\Property\ImdbId($quote['id']),
				new \SpameriTests\Data\Entity\Property\Text($quote['text']),
				new \SpameriTests\Data\Entity\Video\HighLights\Relevancy($quote['relevancy'])
			);
		}
	}


	public function location(
		array $locations
	) : \Generator
	{
		foreach ($locations as $location) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\Location(
				new \SpameriTests\Data\Entity\Property\Text($location['name']),
				new \SpameriTests\Data\Entity\Property\Text($location['note'])
			);
		}
	}


	public function alternateVersion(
		array $alternateVersions
	) : \Generator
	{
		foreach ($alternateVersions as $alternateVersion) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\AlternateVersion(
				new \SpameriTests\Data\Entity\Property\Text($alternateVersion['text'])
			);
		}
	}


	public function companyCredit(
		array $companyCredits
	) : \Generator
	{
		foreach ($companyCredits as $companyCredit) {
			$companyCollection = new \SpameriTests\Data\Entity\Video\HighLights\CompanyCredit\CompanyCollection();
			foreach ($companyCredit['company'] as $company) {
				$companyCollection->add(
					new \SpameriTests\Data\Entity\Video\HighLights\CompanyCredit\Company(
						new \SpameriTests\Data\Entity\Property\ImdbId($company['id']),
						new \SpameriTests\Data\Entity\Property\Text($company['name']),
						new \SpameriTests\Data\Entity\Property\Text($company['note'])
					)
				);
			}
			yield new \SpameriTests\Data\Entity\Video\HighLights\CompanyCredit(
				new \SpameriTests\Data\Entity\Property\Text($companyCredit['group']),
				$companyCollection
			);
		}
	}


	public function goof(
		array $goof
	) : \Generator
	{
		foreach ($goof as $hit) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\Goof(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('text')),
				new \SpameriTests\Data\Entity\Video\HighLights\Relevancy($hit->getValue('relevancy'))
			);
		}
	}


	public function trivia(
		array $trivia
	) : \Generator
	{
		foreach ($trivia as $hit) {
			yield new \SpameriTests\Data\Entity\Video\HighLights\Trivia(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('text')),
				new \SpameriTests\Data\Entity\Video\HighLights\Relevancy($hit->getValue('relevancy'))
			);
		}
	}


	public function plotSummary(
		array $plotSummaries
	) : \Generator
	{
		foreach ($plotSummaries as $plotSummary) {
			yield new \SpameriTests\Data\Entity\Video\Story\PlotSummary($plotSummary);
		}
	}


	public function tagLine(
		array $tagLines
	) : \Generator
	{
		foreach ($tagLines as $tagLine) {
			yield new \SpameriTests\Data\Entity\Video\Story\TagLine($tagLine);
		}
	}


	public function followed(
		array $followed
	) : \Generator
	{
		foreach ($followed as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Followed(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function remade(
		array $remade
	) : \Generator
	{
		foreach ($remade as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Remade(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function spinOff(
		array $spinOff
	) : \Generator
	{
		foreach ($spinOff as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\SpinOff(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function editedInto(
		array $editedInto
	) : \Generator
	{
		foreach ($editedInto as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\EditedInto(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function reference(
		array $reference
	) : \Generator
	{
		foreach ($reference as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Reference(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function referenced(
		array $referenced
	) : \Generator
	{
		foreach ($referenced as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Referenced(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function featured(
		array $featured
	) : \Generator
	{
		foreach ($featured as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Featured(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function spoofed(
		array $spoofed
	) : \Generator
	{
		foreach ($spoofed as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Spoofed(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function follows(
		array $follows
	) : \Generator
	{
		foreach ($follows as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\Follows(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function spunOff(
		array $follows
	) : \Generator
	{
		foreach ($follows as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\SpunOff(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function versionOf(
		array $follows
	) : \Generator
	{
		foreach ($follows as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\VersionOf(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit->getValue('id')),
				new \SpameriTests\Data\Entity\Property\Text($hit->getValue('note'))
			);
		}
	}


	public function editedFrom(
		array $follows
	) : \Generator
	{
		foreach ($follows as $hit) {
			yield new \SpameriTests\Data\Entity\Video\Connections\EditedFrom(
				new \SpameriTests\Data\Entity\Property\ImdbId($hit['id']),
				new \SpameriTests\Data\Entity\Property\Text($hit['note'])
			);
		}
	}

}
