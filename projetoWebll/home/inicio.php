<?php
$page_title = "Demo : Página de Demonstração (PHP)";
// layout do cabeçalho
include_once "../navegacao/teste_layout_header.php"
?>

<header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">Submarino</h1>
        <h2 class="masthead-subheading mb-0">Todo dia ofertas arrasadoras, você não vai querer perder!</h2>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/liquidificador.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Liquidificador Mondial Turbo Power</h2>
            <p>Conheça o liquidificador da Mondial L-99 WB Turbo Power. Além de moderno e elegante na linda cor preta, ele conta com um novo sistema de encaixe pra deixar a montagem mais prática e fácil. Olha, o copo está super-resistente e transparente pra deixar os ingredientes mais visíveis. Sua capacidade total é de até 2,2 litros. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/cadeira.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-4">Cadeira Gamer MX5 Giratoria</h2>
            <p>A nova linha de Cadeira Gamer Mymax, são as mais iradas do mercado, a MX5 possui design ergonômico e revestimento em couro.
              Projetada para proporcionar conforto mesmo após horas jogando. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="img/batedeira.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Batedeira Prática 350W, 127V, Preta, Mondial - B-12-NP</h2>
            <p>350W de potência: Muito mais potência para melhor resultado de suas receitas do dia a dia. Tigela grande de 3, 6 l: Prepara receitas com grande quantidade de ingredientes.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

<?php
include_once "../navegacao/teste_layout_footer.php"
?>