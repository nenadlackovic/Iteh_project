import {HttpException, HttpStatus, Injectable} from '@nestjs/common';
import {InjectRepository} from "@nestjs/typeorm";
import {DeleteResult, Repository, UpdateResult} from "typeorm";
import {Ocena} from "../entity/Ocena.entity";

@Injectable()
export class GradesService {
    constructor(
        @InjectRepository(Ocena)
        private gradesRepository: Repository<Ocena>,
    ) {}

    async findAll() : Promise<Ocena[]> {
        return this.gradesRepository.find({ relations: ["korisnik", "film"] });
    }

    async findOne(id: number): Promise<Ocena> {
        const o = await this.gradesRepository.findOne(id, { relations: ["korisnik", "film"] })
        if(!o){
            throw new HttpException(
            "Grade with given id not found",
             HttpStatus.BAD_REQUEST)
        }
        return o;
    }

    async create(ocena:Ocena) : Promise<boolean>{
        try{
          const o =  await this.gradesRepository.save(ocena, { });
        }
        catch (e) {
            throw new HttpException(
            e.message,
            HttpStatus.SERVICE_UNAVAILABLE
        );
        }
        return true;
    }

    async remove(id:number) : Promise<boolean>{
        const o = await this.gradesRepository.delete(id);
        if (o.raw.affectedRows ===0){
            throw new HttpException(
            "Grade with given id not found",
                      HttpStatus.BAD_REQUEST)

        }
        return true;
    }

    async update(ocena: Ocena, id: any): Promise<boolean> {
        try {
            const result = await this.gradesRepository.update(id, ocena);
            if (result.raw.affectedRows === 0) {
                throw new HttpException(
                    'Grade with given id not found',
                    HttpStatus.NOT_FOUND
                );
            }
            return true;
        }
        catch (error)
        {
            if (error instanceof HttpException && error.getStatus() == HttpStatus.NOT_FOUND) throw error;
            throw new HttpException(
                error.message,
                HttpStatus.SERVICE_UNAVAILABLE
            );
        }
    }

}
