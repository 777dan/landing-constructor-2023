<?php

class Footer extends Block
{

    private $footer_logo_name, $footer_text_color, $footer_bg_color, $footerColHeader, $colElemsArr, $colElemsHrefArr;

    public function __construct($footer_logo_name, $footer_text_color, $footer_bg_color, $footerColHeader, $colElemsArr, $colElemsHrefArr)
    {
        $this->footer_logo_name = $footer_logo_name;
        $this->footer_text_color = $footer_text_color;
        $this->footer_bg_color = $footer_bg_color;
        $this->footerColHeader = $footerColHeader;
        $this->colElemsArr = $colElemsArr;
        $this->colElemsHrefArr = $colElemsHrefArr;
    }
    public function drawStart()
    {
        $str = <<<EOD
        <!-------------Блок 'Footer'-------------------------->
        <footer style='background:{$this->footer_bg_color};' class='page-footer'>
    <div class='container'>
      <div class='row valign-wrapper'>
        <div class='center-align col l6 s12'>
        <h5 style='color:{$this->footer_text_color};'>{$this->footer_logo_name}</h5>
            </div>
EOD;
        return $str;
    }

    public function drawEnd()
    {
        $str = <<<EOD
        </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          Made by <a style='color:{$this->footer_text_color};' class="text-lighten-3">{$this->footer_logo_name}</a>
          </div>
          </div>
        </footer>
    <!------------- Кoнец блокa 'Footer'-------------------->\n
EOD;
        return $str;
    }

    public function draw()
    {
        $str = <<<EOD
        <div class="col l3 s12">
              <h5 style='color:{$this->footer_text_color};'>{$this->footerColHeader}</h5>
              <ul>
EOD;
        return $str;
    }
    public function drawElem($counter)
    {
        $str = <<<EOD
        <li><a style='color:{$this->footer_text_color};' href="{$this->colElemsHrefArr[$counter]}">{$this->colElemsArr[$counter]}</a></li>
EOD;
        return $str;
    }

    public function drawColEnd()
    {
        $str = <<<EOD
        </ul>
        </div>
EOD;
        return $str;
    }

    public function checkType()
    {
        return 'Footer';
    }
}
