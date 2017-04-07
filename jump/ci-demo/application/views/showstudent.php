<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Students View</title>
    <style media="screen">
      table {
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid;
      }
    </style>
  </head>
  <body>

    <table>
      <tr>
        <th>id</th>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
      </tr>

      <?php foreach($records as $rec):?>
        <tr>
          <td><?php echo $rec->id; ?>     </td>
          <td><?php echo $rec->name; ?>   </td>
          <td><?php echo $rec->gender; ?> </td>
          <td><?php echo $rec->age; ?>    </td>
        </tr>
      <?php endforeach;?>

    </table>
  </body>
</html>
