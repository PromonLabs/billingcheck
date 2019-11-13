#!/bin/bash



vSTARTM=`date  "+%Y%m%d_%H%M%S"`
STARTx=$(date +%s)

for x in adsl ADSL VPN session com_hourx all_usage IMS INT MMS EMM usage_2G GSM DIAX ady adx day03x
do
inc=5001

for i in `ls /home/nocuser/platforms/com_data/alldata2015/adsldok/*$x* | tail -119`
do 

vTEMP=$x$inc
echo $vTEMP

inc=`expr $inc + 1`

#echo $i
cp $i /home/nocuser/public_html/comverse/theupgrade/$vTEMP.jpeg

done
done


ENDx=$(date +%s)
DIFFx=$(( $ENDx - $STARTx ))
echo "$vSTARTM,get_images,$DIFFx">>/home/nocuser/platforms/runlogdir/get_images.log
