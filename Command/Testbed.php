<?php
namespace Stepzerosolutions\Cabbybase\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class Testbed extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('sz:cabbybase');
        $this->setDescription('A CLI for stepzero.solutions cabby system testing commands');
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$objectManager = $this->getObjectManager();
		$this->testTable($input, $output);
    }
	
	protected function testTable($input, $output){
		$objectManager = $this->getObjectManager();
		$this->pxpay = $objectManager->get('Stepzerosolutions\Cabbybase\Model\Google\Calendar');
		$output->writeln( $this->pxpay->setCalandarConnection() );
	}

}