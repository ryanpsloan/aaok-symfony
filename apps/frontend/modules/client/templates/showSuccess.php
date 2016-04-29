<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $client->getId() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $client->getLastName() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $client->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Parent guardian name:</th>
      <td><?php echo $client->getParentGuardianName() ?></td>
    </tr>
    <tr>
      <th>Address line:</th>
      <td><?php echo $client->getAddressLine() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $client->getCityId() ?></td>
    </tr>
    <tr>
      <th>State:</th>
      <td><?php echo $client->getStateId() ?></td>
    </tr>
    <tr>
      <th>Zipcode:</th>
      <td><?php echo $client->getZipcodeId() ?></td>
    </tr>
    <tr>
      <th>Telephone1:</th>
      <td><?php echo $client->getTelephone1() ?></td>
    </tr>
    <tr>
      <th>Telephone2:</th>
      <td><?php echo $client->getTelephone2() ?></td>
    </tr>
    <tr>
      <th>School:</th>
      <td><?php echo $client->getSchool() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $client->getEmail() ?></td>
    </tr>
    <tr>
      <th>Family size:</th>
      <td><?php echo $client->getFamilySize() ?></td>
    </tr>
    <tr>
      <th>City area:</th>
      <td><?php echo $client->getCityArea() ?></td>
    </tr>
    <tr>
      <th>Service:</th>
      <td><?php echo $client->getServiceId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('client/edit?id='.$client->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('client/index') ?>">List</a>
