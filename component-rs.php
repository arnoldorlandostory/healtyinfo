<?php

function component($rumahsakitname, $rumahsakitlocation, $rumahsakitimage, $rs_id){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"book.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$rumahsakitimage\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$rumahsakitname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <h5>
                                <span class=\"price\">$rumahsakitlocation</span>
                            </h5>

                            <button href=\"#nextslide\" type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Pilih ini </button>
                            <input type='hidden' name='rs_id' value='$rs_id'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function formElement($rumahsakitimage, $rumahsakitname, $rumahsakitlocation, $rs_id){
    $element="
    <form action=\"form.php?action=remove&id=$rs_id\" method=\"post\" class=\"form-items\" >
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3\">
            <img src=$rumahsakitimage alt=\"\" class=\"img-fluid\">
        </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$rumahsakitname</h5>
                <h5 class=\"pt-2\">$rumahsakitlocation</h5>
                <button type=\"submit\" class=\"btn btn-warning\">Change</button>
            </div>
        </div>
    </div>
</form>
    
    ";
    echo $element;
}