<section id="faq-section">
    <h2 class="title">Frequently Ask Question (FAQ) </h2>
    <ul class="faq-list">

        <?php
        require "./pages/faq-data.php";


        // divide by two cuz the array contain a pair of question and answer, thus, the number of question 
        for ($i = 1; $i <=  sizeof($faq_data) / 2; $i++) {

        ?>
            <li>
                <div class="question">
                    <span class="left-text-highlight"></span>
                    <i class="fa-solid fa-caret-right"></i>
                    <!-- <i class="fa-solid fa-caret-up"></i> -->
                    <span>
                        <?php
                        echo  $faq_data["question" . $i];
                        ?>
                    </span>
                </div>
                <div class="answer">
                    <p> <?php
                        echo $faq_data["answer" . $i];
                        ?>
                    </p>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>

</section>