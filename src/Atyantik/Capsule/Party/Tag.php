<?php
/**
 * +-----------------------------------------------------------------------+
 * | Copyright (c) 2010, David Coallier & echolibre ltd                    |
 * | All rights reserved.                                                  |
 * |                                                                       |
 * | Redistribution and use in source and binary forms, with or without    |
 * | modification, are permitted provided that the following conditions    |
 * | are met:                                                              |
 * |                                                                       |
 * | o Redistributions of source code must retain the above copyright      |
 * |   notice, this list of conditions and the following disclaimer.       |
 * | o Redistributions in binary form must reproduce the above copyright   |
 * |   notice, this list of conditions and the following disclaimer in the |
 * |   documentation and/or other materials provided with the distribution.|
 * | o The names of the authors may not be used to endorse or promote      |
 * |   products derived from this software without specific prior written  |
 * |   permission.                                                         |
 * |                                                                       |
 * | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
 * | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
 * | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
 * | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
 * | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
 * | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
 * | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
 * | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
 * | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
 * | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
 * | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
 * |                                                                       |
 * +-----------------------------------------------------------------------+
 * | Author: David Coallier <david@echolibre.com>                          |
 * +-----------------------------------------------------------------------+.
 *
 * PHP version 5
 *
 * @category  Services
 *
 * @author    David Coallier <david@echolibre.com>
 * @copyright echolibre ltd. 2009-2010
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 *
 * @link      http://github.com/davidcoallier/Services_Capsule
 *
 * @version   GIT: $Id$
 */

/**
 * Services_Capsule.
 *
 * @category Services
 *
 * @author   David Coallier <david@echolibre.com>
 * @license  http://www.opensource.org/licenses/bsd-license.php The BSD License
 *
 * @link     http://github.com/davidcoallier/Services_Capsule
 * @link     http://capsulecrm.com/help/page/javelin_api_party
 *
 * @version  Release: @package_version@
 */
class AtyantikCapsulePartyTag extends AtyantikCapsuleCommon
{
    /**
     * Get party tags.
     *
     * A list of tags for a party.
     *
     * @link    /api/party/{id}/tag
     *
     * @throws AtyantikCapsuleRuntimeException
     *
     * @param float $partyId The party to retrieve the tags from.
     *
     * @return stdClass A stdClass object containing the information from.
     *                  the json-decoded response from the server.
     */
    public function getAll($partyId)
    {
        $url = '/'.(double) $partyId.'/tag';
        $response = $this->sendRequest($url);

        return $this->parseResponse($response);
    }

    /**
     * Add a tag to a party.
     *
     * The tag name will need to be URL encoded. If the tag is already present on 
     * the party status in the response will be 200 OK, when the tag is added
     * the response will be 201 Created. 
     *
     * @link /api/party/{party-id}/tag/{tag-name}
     *
     * @throws AtyantikCapsuleRuntimeException
     *
     * @param float  $partyId The party to create the tags on.
     * @param string $tagName The name of the new tag to create.
     *
     * @return mixed bool|stdClass         A stdClass object containing the information from
     *               the json-decoded response from the server.
     */
    public function add($partyId, $tagName)
    {
        $url = '/'.(double) $partyId.'/tag/'.urlencode($tagName);
        $response = $this->sendRequest($url, HTTP_Request2::METHOD_POST);

        return $this->parseResponse($response);
    }

    /**
     * Delete a tag from a party.
     *
     * The tag name will need to be URL encoded.
     *
     * @link /api/party/{party-id}/tag/{tag-name}
     *
     * @throws AtyantikCapsuleRuntimeException
     *
     * @param float  $partyId The party to delete the tags from.
     * @param string $tagName The name of the new tag to delete.
     *
     * @return mixed bool|stdClass         A stdClass object containing the information from
     *               the json-decoded response from the server.
     */
    public function delete($partyId, $tagName)
    {
        $url = '/'.(double) $partyId.'/tag/'.urlencode($tagName);
        $response = $this->sendRequest($url, HTTP_Request2::METHOD_DELETE);

        return $this->parseResponse($response);
    }
}
