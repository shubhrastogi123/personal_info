<?php
        $connection =mysqli_connect("localhost","root","80Voltas@php","data");
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $address = $_POST['address1'];
        $contact = $_POST['contact'];
        $pin_code = $_POST['pincode'];

        //curl code and below link is combination of search engine key and API key which we get from using REST page og google api
        $url="https://www.googleapis.com/customsearch/v1?key=AIzaSyB9RHdLAFl6Zexdt6yJzqPN7Okg6-LS8RU&cx=c2538384f09b54aa4&q=$first_name";        
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        curl_setopt($ch, CURLOPT_URL, $url);
    
        $result = curl_exec($ch);
    
        $result = json_decode($result, true);
        echo var_dump($result);
        curl_close($ch);

        if(!$connection){
            die("could not connect".mysqli_connect_error());
        }
    
        $query ="INSERT INTO personal_info (first_name,last_name,address1,contact,pin_code) VALUES('$first_name','$last_name','$address',$contact,'$pin_code')";
        $stmt =mysqli_query($connection,$query);
    
        ?>