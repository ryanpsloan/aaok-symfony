<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $client_volunteer_map->getId() ?></td>
    </tr>
    <tr>
      <th>Client:</th>
      <td><?php echo $client_volunteer_map->getClientId() ?></td>
    </tr>
    <tr>
      <th>Volunteer:</th>
      <td><?php echo $client_volunteer_map->getVolunteerId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('client_volunteer_map/edit?id='.$client_volunteer_map->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('client_volunteer_map/index') ?>">List</a>
