<h1>Client volunteer map List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Client</th>
      <th>Volunteer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($client_volunteer_map_list as $client_volunteer_map): ?>
    <tr>
      <td><a href="<?php echo url_for('client_volunteer_map/show?id='.$client_volunteer_map->getId()) ?>"><?php echo $client_volunteer_map->getId() ?></a></td>
      <td><?php echo $client_volunteer_map->getClientId() ?></td>
      <td><?php echo $client_volunteer_map->getVolunteerId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('client_volunteer_map/new') ?>">New</a>
