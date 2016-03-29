<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SmartLab\FaqTool\Api\Data;

/**
 * CMS block interface.
 * @api
 */
interface FaqInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const FAQ_ID = 'faq_id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get question part
     *
     * @return string|null
     */
    public function getQuestion();

    /**
     * Get answer part
     *
     * @return string|null
     */
    public function getAnswer();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set ID
     *
     * @param int $id
     * @return FaqInterface
     */
    public function setId($id);

    /**
     * Set question part
     *
     * @param string $question
     * @return FaqInterface
     */
    public function setQuestion($question);

    /**
     * Set answer part
     *
     * @param string $answer
     * @return FaqInterface
     */
    public function setAnswer($answer);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return FaqInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return FaqInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return FaqInterface
     */
    public function setIsActive($isActive);
}
