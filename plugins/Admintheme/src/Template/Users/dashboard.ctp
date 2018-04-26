<?php $lan = $cookie_value['lan'];
$weak_list= ['1' => 'Current Week', '2' => 'Last Week', '3' => 'Last To Last Week'];

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?=__('DASHBOARD')?></h2>
            </div>
            <?= $this->Flash->render() ?>
            
           
        </div>
    </section>
<script>
    
    function getNewArtiCount(clicked_id)
        {
            
                var category_id = $('#category-id').val();
                
             // alert(category_id);
               
         var urls = '<?= $this->Url->build(['controller' =>'Users', 'action' =>'getNewArtiCount'])?>';
   //alert(urls);
           var data = '&category_id=' + escape(category_id);
             $.ajax({
                 
        type: "POST",
        
        cache:false,
       
        data: data,
        
        url: urls,
        
        success: function(html)
            {
                            
                          //alert(html);
                            
                   $('#new_article_count').html(html); 
            } 
    });
    return false;
        }
        
        
     function getLangCount(clicked_id)
        {
            
                var language_id = $('#language-id').val();
                
              // alert(language_id);
               
         var urls = '<?= $this->Url->build(['controller' =>'Users', 'action' =>'getLangCount'])?>';
   
           var data = '&language_id=' + escape(language_id);
             $.ajax({
                 
        type: "POST",
        
        cache:false,
       
        data: data,
        
        url: urls,
        
        success: function(html)
            {
                            
                          //alert(html);
                            
                   $('#new_language_count').html(html); 
            } 
    });
    return false;
        }   
    
    // Ajax for Weak News Count
        function getNewweakCount(clicked_id)
        {
            var news_data = $('#news_wcount').val();
            var urls = '<?= $this->Url->build(['controller' =>'Users', 'action' =>'getNewweakCount'])?>';
            //alert(urls);
            var data = '&news_wdata=' + escape(news_data);
                $.ajax({

                type: "POST",
                cache:false,
                data: data,
                url: urls,
                success: function(html)
                {
                   // alert(html);
                    $('#news_count_weak').html(html); 
                },
                error: function(){
                    $('#news_count_weak').html('<?= $new ?>'); 
                }
            });
           return false;
        }
        
        
        // Ajax for Weak Article Count
        
        function getArtiweakCount(clicked_id)
        {
            var article_data = $('#article_wcount').val();
            var urls = '<?= $this->Url->build(['controller' =>'Users', 'action' =>'getArtiweakCount'])?>';
            var data = '&news_wdata=' + escape(article_data);
                $.ajax({
                    
                    type: "POST",
                    cache:false,
                    data: data,
                    url: urls,
                    success: function(html)
                    {
                        $('#article_count_weak').html(html); 
                    },
                    error: function(){
                        $('#article_count_weak').html('<?= $articles_count ?>'); 
                    } 
                });
           return false;
        }  
    

//function initLineChart() {
//    Morris.Line({
//        element: 'real_time_chart',
//        data: <?php // echo json_encode($visitorscount) ?>,
//            xkey: 'y',
//            ykeys: ['Visitors'],
//            labels: ['Visitors'],
//            lineColors: ['rgb(233, 30, 99)'],
//            lineWidth: 3
//    });
//}

var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}
</script>