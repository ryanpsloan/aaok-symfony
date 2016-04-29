<h1>Client List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Last name</th>
      <th>First name</th>
      <th>Parent guardian name</th>
      <th>Address line</th>
      <th>City</th>
      <th>State</th>
      <th>Zipcode</th>
      <th>Telephone1</th>
      <th>Telephone2</th>
      <th>School</th>
      <th>Email</th>
      <th>Family size</th>
      <th>City area</th>
      <th>Service</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($client_list as $client): ?>
    <tr>
      <td><a href="<?php echo url_for('client/show?id='.$client->getId()) ?>"><?php echo $client->getId() ?></a></td>
      <td><?php echo $client->getLastName() ?></td>
      <td><?php echo $client->getFirstName() ?></td>
      <td><?php echo $client->getParentGuardianName() ?></td>
      <td><?php echo $client->getAddressLine() ?></td>
      <td><?php echo $client->getCityId() ?></td>
      <td><?php echo $client->getStateId() ?></td>
      <td><?php echo $client->getZipcodeId() ?></td>
      <td><?php echo $client->getTelephone1() ?></td>
      <td><?php echo $client->getTelephone2() ?></td>
      <td><?php echo $client->getSchool() ?></td>
      <td><?php echo $client->getEmail() ?></td>
      <td><?php echo $client->getFamilySize() ?></td>
      <td><?php echo $client->getCityArea() ?></td>
      <td><?php echo $client->getServiceId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('client/new') ?>">New</a>
