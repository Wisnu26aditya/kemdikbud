<table border=1>
	<tr>
		<th>Scan Date</th>
		<th>Pin</th>
		<th>Nama Karyawan</th>
		<th>Departemen</th>
	</tr>
<?php
error_reporting(0);
$sql = "select a.att_id,
				a.scan_date,
				c.alias nama_karyawan,
				a.pin,
				substr(a.scan_date,1,10) Tanggal,
				substr(a.scan_date,12,9) Jam,
				d.level_id
		from att_log a,
			 mode b,
			 emp c,
			 dept d
		where a.io_mode = b.io_mode
			  and a.pin = c.pin
			  and c.dept_id_auto = d.dept_id_auto
		order by a.scan_date asc";
$quesql=mysql_query($sql);
while($dt=mysql_fetch_array($quesql)){
	echo"<tr>
			<td>".$dt[scan_date]."</td>
			<td>".$dt[pin]."</td>
			<td>".$dt[nama_karyawan]."</td>
			<td>".$dt[level_id]."</td>
		</tr>";
}
?>
</table>