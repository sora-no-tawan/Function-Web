function CalDate($time1,$time2)
{
        $time1 = strtotime($time1);
        $time2 = strtotime($time2);

        $distanceInSeconds = round(abs($time2 - $time1));
        $distanceInMinutes = round($distanceInSeconds / 60);

        $days = floor(abs($distanceInMinutes / 1440));
        $hours = floor(fmod($distanceInMinutes, 1440)/60);
        $minutes = floor(fmod($distanceInMinutes, 60));

        if($days == 0 and $hours == 0 and $minutes != 0)
        {
            return 'Minute: '.$minutes;
        }
        elseif($days == 0 and $hours != 0 and $minutes == 0)
        {
            return 'Hour: '.$hours;
        }
        elseif($days == 0 and $hours != 0 and $minutes != 0)
        {
            return 'Hour: '.$hours.' Minute: '.$minutes;
        }
        else
        {
            return 'Days: '.$days.' Hour: '.$hours.' Minute: '.$minutes;
        }
}
