#!/bin/bash

vSTARTM=`date  "+%Y%m%d_%H%M%S"`
STARTx=$(date +%s)


sleep 9

for x in session
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


find /home/nocuser/platforms/com_data/alldata2015/adsldok/ -type f -name "*session02x*" -mmin +700 -exec rm  {} \;



ENDx=$(date +%s)
DIFFx=$(( $ENDx - $STARTx ))
echo "$vSTARTM,getsessions_images,$DIFFx">>/home/nocuser/platforms/runlogdir/getsessions_images.log
