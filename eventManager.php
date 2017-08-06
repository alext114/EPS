<?php

  public class eventManager{

    var $eventID


    function checkAvailabilty($wantsPartyRoom, $date){
    $systemDate=date("Y-m-d");
    $diffOfDates= date_diff($systemDate,$date);
    $isBooked=false; //declaring variable
    //sql statement that retrieves partyRoomBook boolean from the given datee

    $query = mysqli_query($db, "SELECT partyRoomBook FROM events WHERE date='$date'");
    //num_rows returns number of rows returned from query statement
    $numOfEvents = mysqli_num_rows($query);
    //3 is the max amount of events in a day
    if (numOfEvents >= 3){
        return false;
    }
    else{
        //test to see if new event requires party room, if true it mmust now check if any other event on that day has the party room already booked
        if($wantsPartyRoom== true){
            //$query is the query stated above
            while($row = mysqli_fetch_assoc($query)){
                //if true isBooked is set to true else false
                if($row['partyRoomBook']==true){
                    isBooked=true;
                    break;
                }
                else
                {
                    isBooked=false
                }//end partyRooomBook if
            }//end while
            if (isBooked==true){
                //room is booked, return false, about availiabilty
                return false;

                    
            }
            else{
                //if the timespan between the dates is over 30, warning message is given.
                if($diffOfDates>=30){
                echo "Movie might not be available if booking a month in advance. Please finish booking and then call the manager at the movie theater you are booking at to verify. "                    
                return true;
                }
            }//end isBooked if
        }//end $wantsPartyRoom if
    }
     //if the timespan between the dates is over 30, warning message is given.    
    if($diffOfDates>=30){
    echo "Movie might not be available if booking a month in advance. Please finish booking and then call the manager at the movie theater you are booking at to verify. "                    
    return true;
    }   

    }

    function generateEventSheet(){

    }

    function placeInQueue($submittedEvent){
        
        $queryEvents = INSERT INTO events_queue ($submittedEvent['fullName'],$submittedEvent['emailAddress'],$submittedEvent['phoneNumber'],$submittedEvent['eventDate'],$submittedEvent['movie'],$submittedEvent['eventTime'],$submittedEvent['rate'],$submittedEvent['numOfPeople'],$submittedEvent['specialAttention'],$submittedEvent['eventType'],$submittedEvent['depositAmt'],$submittedEvent['receivedDeposit'],$submittedEvent['partyRoomBook'],$submittedEvent['childName'],$submittedEvent['isApproved'],$submittedEvent['eventType'],$submittedEvent['theater']) WHERE (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`);
        $result = $db->prepare($queryEvents);
        $result->execute(); 
    }

    function createEvent(){

    }
  }


?>
