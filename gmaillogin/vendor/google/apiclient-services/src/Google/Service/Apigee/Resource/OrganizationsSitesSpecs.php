<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "specs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $specs = $apigeeService->specs;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesSpecs extends Google_Service_Resource
{
  /**
   * Lists details for the OpenAPI Specifications associated with an API.
   * (specs.listProxySpecs)
   *
   * @param string $name Required. Name of the API. Use the following structure in
   * your request:   `organizations/{org}sites/{site}/specs/{api}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListProxySpecsResponse
   */
  public function listProxySpecs($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('listProxySpecs', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListProxySpecsResponse");
  }
}
