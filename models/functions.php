<?php
    // funkcija za citanje podataka iz baze
    function vratiSve($nazivTabele){
        global $conn;
        $upit = "SELECT * FROM $nazivTabele where IsActive = 1"; 
        $podaci = $conn-> query($upit)->fetchAll();
        return $podaci;
    }


    // funkcija za spajanje tabela(JOIN)
    function vratiBlogove(){
        global $conn;
        $upit = "SELECT b.id as blogId, b.blogTitle as title, b.blogContent as blog, b.UserId as userId, u.FirstName as firstName, u.LastName as lastName, 
                u.username, b.TopicId as topicId, t.Topic, b.CreatedAt as published, b.Image as image, t.Topic as topic
                from blogs as b 
                inner join users as u on b.UserId = u.Id 
                inner join topics as t on b.TopicId = t.Id 
                where b.IsActive = 1";
        $podaci = $conn->query($upit)->fetchAll();
        return $podaci;
    } 

    function error($errors, $name, $alert){
        if(isset($errors[$name])){
            echo "<div class='mt-2 alert alert-".$alert."'>". $errors[$name] ."</div>";
        }
        else{
            echo "";
        }
    }
 

    function value($post, $value){
        if(isset($post[$value])){
            echo $post[$value];
        }
        else{
            echo "";
        }
    }

    function pretty_relative_time($time) {
        if ($time !== intval($time)) { $time = strtotime($time); }
        $d = time() - $time;
        if ($time < strtotime(date('Y-m-d 00:00:00')) - 60*60*24*3) {
        $format = 'F j';
        if (date('Y') !== date('Y', $time)) {
       $format .= ", Y";
        }
        return date($format, $time);
        }
        if ($d >= 60*60*24) {
        $day = 'Yesterday';
        if (date('l', time() - 60*60*24) !== date('l', $time)) { $day = date('l', $time); }
        return $day . " at " . date('g:ia', $time);
        }
        if ($d >= 60*60*2) { return intval($d / (60*60)) . " hours ago"; }
        if ($d >= 60*60) { return "about an hour ago"; }
        if ($d >= 60*2) { return intval($d / 60) . " minutes ago"; }
        if ($d >= 60) { return "about a minute ago"; }
        if ($d >= 2) { return intval($d) . " seconds ago"; }
        return "a few seconds ago";
       }
    
?>