<?php
namespace SmartLab\FaqTool\Model;

use Magento\Framework\Model\AbstractModel;
use SmartLab\FaqTool\Api\Data\FaqInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{
    /**
     * FAQ cache tag
     */
    const CACHE_TAG = 'faqtool_faq';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'faqtool_faq';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('SmartLab\FabTool\ResourceModel\Faq');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get question part
     *
     * @return string|null
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Get answer part
     *
     * @return string|null
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set question part
     *
     * @param string $question
     * @return FaqInterface
     */
    public function setQuestion($question)
    {
        $this->setData(self::QUESTION, $question);
        return $this;
    }

    /**
     * Set answer part
     *
     * @param string $answer
     * @return FaqInterface
     */
    public function setAnswer($answer)
    {
        $this->setData(self::ANSWER, $answer);
        return $this;
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return FaqInterface
     */
    public function setCreationTime($creationTime)
    {
        $this->setData(self::CREATION_TIME, $creationTime);
        return $this;
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return FaqInterface
     */
    public function setUpdateTime($updateTime)
    {
        $this->setData(self::UPDATE_TIME, $updateTime);
        return $this;
    }

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return FaqInterface
     */
    public function setIsActive($isActive)
    {
        $this->setData(self::IS_ACTIVE, $isActive);
        return $this;
    }
}