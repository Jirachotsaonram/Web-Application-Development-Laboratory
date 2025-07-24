<?php



/**
 * Class สำหรับสร้างตารางสูตรคูณ
 */
class StudentId_MultiplicationTable {
    public function generateTable($multiplier, $limit = 12) {
        $table = [];
        for ($i = 1; $i <= $limit; $i++) {
            $table[] = [
                'expression' => "{$multiplier} x {$i}",
                'result' => $multiplier * $i
            ];
        }
        return $table;
    }
}

/**
 * Class สำหรับคำนวณค่าจ้างพนักงาน
 */
class StudentId_EmployeeWageCalculator {
    private $hourlyRate = 50;
    private $otRate1 = 20; // ชั่วโมงที่ 9-12
    private $otRate2 = 10; // ชั่วโมงที่ 13 ขึ้นไป
    private $warningThreshold = 20;

    public function calculateWage($hours) {
        $wage = 0;
        $warning = false;

        if ($hours <= 8) {
            $wage = $hours * $this->hourlyRate;
        } elseif ($hours <= 12) {
            $wage = (8 * $this->hourlyRate) + (($hours - 8) * $this->otRate1);
        } else { // $hours > 12
            $wage = (8 * $this->hourlyRate) + (4 * $this->otRate1) + (($hours - 12) * $this->otRate2);
        }

        if ($hours > $this->warningThreshold) {
            $warning = true;
        }

        return ['wage' => $wage, 'warning' => $warning];
    }
}

/**
 * Class สำหรับคำนวณดอกเบี้ยเงินฝาก
 */
class StudentId_InterestCalculator {
    private $interestRate = 0.015; // 1.5%

    public function calculateAnnualBalance($initialDeposit, $years) {
        $annualBalances = [];
        $currentAmount = $initialDeposit;

        for ($i = 1; $i <= $years; $i++) {
            $currentAmount = $currentAmount * (1 + $this->interestRate);
            $annualBalances[] = [
                'year' => $i,
                'balance' => $currentAmount
            ];
        }
        return $annualBalances;
    }
}

?>