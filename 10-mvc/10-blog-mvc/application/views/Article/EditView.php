<?php

namespace Blog\Views;

use Blog\Library\View;
use Blog\Model\Entities\Article;
use Blog\Model\Entities\Category;

/**
 * Class Article_EditView
 * @package Blog\Views
 * @property Article $article
 * @property Category[] $categories
 * @property string $formError
 */
class Article_EditView extends View{

  /**
   * Funkce pro zobrazení view
   */
  function display(){
    echo '<h1>Úprava článku</h1>';

    if($this->formError){
      echo '<div class="errors">'.$this->formError.'</div>';
    }

    echo '<form action="'.BASE_URL.'/article/edit" method="post">
            <input type="hidden" name="id" value="'.$this->article->id.'" />
            <label for="title">Název článku:</label><br />
            <input type="text" name="title" id="title" value="'.htmlspecialchars(@$this->article->title).'" required /><br />
            <label for="perex">Perex:</label><br />
            <textarea name="perex" id="perex" class="wysiwyg" >'.htmlspecialchars(@$this->article->perex).'</textarea><br />
            <label for="content">Obsah článku:</label><br />
            <textarea name="content" id="content" class="wysiwyg" >'.htmlspecialchars(@$this->article->content).'</textarea><br />
            <label for="category">Kategorie:</label><br />
            <select name="category" id="category"><option value="">--vyberte--</option>';
    foreach($this->categories as $category){
      echo '<option value="'.$category->id.'" '.(@$this->article->category==$category->id?'selected="selected"':'').'>'.htmlspecialchars($category->name).'</option>';
    }
    echo '</select><br />';
    echo '<input type="submit" value="uložit" />';
    echo '<a href="'.BASE_URL.'/article/show?id='.$this->article->id.'">zrušit</a>';
    echo '</form>';
  }
}