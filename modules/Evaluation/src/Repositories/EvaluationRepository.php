<?php 
namespace Modules\Evaluation\Src\Repositories;
use App\Repositories\BaseRepository;
use Modules\Evaluation\Src\Models\Evaluation;
use Modules\Evaluation\Src\Repositories\EvaluationRepositoryInterface;

class EvaluationRepository extends BaseRepository implements EvaluationRepositoryInterface {
    public function getModel(){
        return Evaluation::class;
    } 

}