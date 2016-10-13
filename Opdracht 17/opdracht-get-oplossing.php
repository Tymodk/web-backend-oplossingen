<?php
    $articles = array(
           array('titel' => 'Thailand\'s King Bhumibol Adulyadej dead at 88',
                 'inhoud' => 'Thailand\'s King Bhumibol Adulyadej, the world\'s longest-reigning monarch, has died after 70 years as head of state, the palace says.
The 88-year-old king was widely revered but had been in poor health in recent years, making few public appearances.

He was seen as a stabilising figure in a country hit by cycles of political turmoil and multiple coups.

Crown Prince Maha Vajiralongkorn will be the new monarch, the prime minister has said.

In a televised address to the nation, Prayut Chan-ocha said Thailand would hold a one-year mourning period and that all entertainment functions must be "toned down" for a month.

"He is now in heaven and may be looking over Thai citizens from there," he said of King Bhumibol.' ,
                 'img' => 'thaiking.png',
                 'imgDescription' => 'The king of Thailand'),
           array('titel' => 'US Election 2016: Trump \'groped woman like an octopus\'',
                 'inhoud' => 'Donald Trump is facing a series of allegations of inappropriate sexual contact, after US media reported claims from several women.

Two women told the New York Times that the Republican presidential candidate groped or kissed them.

A People magazine reporter also said she was forcibly kissed, while another woman said Mr Trump grabbed her bottom.

Mr Trump fired back on Twitter, calling the claims a "total fabrication" and denying the People reporter\'s account.' ,
                 'img' => 'trump.png' ,
                 'imgDescription' => 'Picture of candidate Donald Trump and woman' ),
           array('titel' => 'Bob Dylan wins Nobel Literature Prize',
                 'inhoud' => 'US singer Bob Dylan has been awarded the 2016 Nobel Prize for Literature, becoming the first songwriter to win the prestigious award.

The 75-year-old rock legend received the prize "for having created new poetic expressions within the great American song tradition".

The balladeer, artist and actor is the first American to win since novelist Toni Morrison in 1993.

His songs include Blowin\' in the Wind and The Times They are A-Changin\'.

Sara Danius, permanent secretary of the Swedish Academy, said Dylan had been chosen because he was "a great poet in the English speaking tradition".

"For 54 years now he\'s been at it reinventing himself, constantly creating a new identity," she told reporters in Stockholm.

The singer is due to perform later at the Cosmopolitan hotel in Las Vegas.',
                 'img' => 'dylan.jpg',
                 'imgDescription' => 'Bob Dylan')   
      );
  $soloArtikel = false;
  $doesNotExist = false; 
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    if(array_key_exists($id, $articles)){
      $articles = array($articles[$id]);
      $soloArtikel = true;

    }
    else{
      $doesNotExist = true;
    }
  }

  
?>

<!DOCTYPE html>
<html>
	<head>
    <?php if(!$soloArtikel): ?>
		  <title>Articles</title>
    <?php elseif ($doesNotExist): ?>
      <title>Dit artikel bestaat niet.</title>
    <?php else: ?>
      <title><?= $articles[0]['titel'] ?></title>
    <?php endif ?>
	</head>
  <style>
    
    h1{
      border-bottom: solid #eeeeee;
      margin-left: 25px;
      margin-bottom: 0px;
    }
    .article{
      background-color: #eeeeee;
      margin-top: 20px;
      margin-left: 25px;
      margin-right: 25px; 
      width: 30%;
      height: 100%;
      float: left;
    }
    .active
    {
      width: 55%;
      margin-left: 25%; 
    }

    img{
      width: 95%;
      margin-left: 2.5%;
      margin-right: 2.5%; 
      margin-bottom: 2.5%;
    }
      .active img{
      width: 25%;
      float: right;
    }
    h3{

      text-align: center;

    }
    .active h3{
      margin-left: 2.5%;
      text-align: left;
    }
    .cfr{
      clear: both;
    }
    p{

      margin-left: 2.5%;
      margin-right: 2.5%;
    }
    a{

      margin-right  : 2.5%;
      margin-bottom: 2.5%;
      color: orange; 
      float: right;

    }
    .hidden
    {
      visibility: hidden;
    }
    .active p{
      font-size: 20px;
    }

  </style>
	<body>
    <?php if(!$soloArtikel): ?>
      <h1>De krant van vandaag</h1>
    <?php else: ?>
      <h1>Individueel Artikel</h1>
    <?php endif ?>
      <?php if(!$doesNotExist): ?>
        <div class="container cfr">

        <?php foreach($articles as $id => $article): ?>
        <div class="article <?php echo ($soloArtikel) ? 'active': '' ?>">
            <h3><?= $article['titel'] ?> </h3>
            <img src="img/<?= $article['img'] ?>" alt="<?= $article['imgDescription']?>">
            <p><?php echo (!$soloArtikel) ? substr($article['inhoud'],0,50) . '...' : $article['inhoud']; ?></p>
            <a class="<?php echo ($soloArtikel) ? 'hidden': '' ?>"href="opdracht-get-oplossing.php?id=<?= $id ?>">Lees meer</a>
        </div>
          
          <?php endforeach ?>

      </div> 
    <?php else: ?>
      <h2>404 Article not found</h2>
    <?php endif ?>  
    
	</body>
</html>