<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $city->getId() ?></td>
    </tr>
    <tr>
      <th>City name:</th>
      <td><?php echo $city->getCityName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('city/edit?id='.$city->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('city/index') ?>">List</a>
