<html>
  <head>
    <title><?=$this->e($title)?></title>
  </head>
  <body>

    <nav>
      <ul>
        <li><a href="/home">Homepage</a></li>
        <li><a href="/about">Abaout</a></li>
      </ul>
    </nav>

    <?=$this->section('content')?>
  </body>
</html>



